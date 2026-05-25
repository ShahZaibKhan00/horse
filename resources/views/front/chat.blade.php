@extends('layouts.user_app')

@section('content')
    <div class="user_main_content">
        <div class="dark_bar">
            <h2>Chat Messages</h2>
            <a href="#!" class="points_btn" data-bs-toggle="modal" data-bs-target="#pointsModal">
                <img src="{{ asset('assets/images/points_icon.png') }}" alt="" class="img-fluid mb-2">
                E-Wallet
            </a>
        </div>
        <x-credit-modal />
        <div class="inner_content_wrapper">
            <div class="chat_flex">
                <div class="chat-sidebar" id="conversations-list">
                    <div class="sidebar-title">Recent Chats</div>
                    @forelse($conversations as $conv)
                        @php
                            $otherUser = $conv->sender_id == auth()->id() ? $conv->receiver : $conv->sender;
                            $lastMessage = $conv->messages->sortByDesc('created_at')->first();
                            $unreadCount = $conv->messages->where('user_id', '!=', auth()->id())->where('is_read', 0)->count();
                            
                            $isRealEstate = $conv->product_type == 'real_estate' || $conv->product_type == 'realestates';
                            $isService = $conv->product_type == 'services';
                            
                            $product = null;
                            if ($conv->product_type == 'horse') {
                                $product = $conv->horse;
                            } elseif ($isRealEstate) {
                                $product = $conv->realestate;
                            } elseif ($isService) {
                                $product = $conv->service;
                            }
                            
                            $listingName = '';
                            $listingAge = '';
                            $listingBreed = '';
                            $listingSex = '';
                            $listingLocation = '--';
                            $listingUrl = '#';
                            $agentName = '';
                            $companyName = '';

                            if ($isRealEstate && $product) {
                                $listingName = $product->real_location ?? '--';
                                $agentName = $product->agent_name ?? '--';
                                $companyName = $product->real_farm_name ?? '--';
                                
                                $location = $product->real_location ?? '';
                                if (preg_match('/\((.*?)\)/', $location, $matches)) {
                                    $listingLocation = strtoupper($matches[1]);
                                } else {
                                    $listingLocation = strtoupper($location);
                                }
                                
                                $listingUrl = route('realstate.detail', Crypt::encrypt($product->id));
                            } elseif ($isService && $product) {
                                $agentName = $product->full_name ?? '--';
                                $companyName = $product->business_name ?: ($product->business_name1 ?? '--');
                                $listingName = $agentName . ($agentName != '--' && $companyName != '--' ? ' | ' : '') . ($companyName != '--' ? $companyName : '');
                                if ($listingName == '--' || $listingName == ' | ') $listingName = 'Service Provider';
                                
                                $listingUrl = url('service_details/' . Crypt::encrypt($product->id));
                            } elseif ($product) {
                                $listingName = $product->pro_name ?? '--';
                                
                                $years = $product->pro_age_year ?? null;
                                $months = $product->pro_age_month ?? null;
                                if ($years !== null || $months !== null) {
                                    if ($years !== null) {
                                        $listingAge .= $years . ($years == 1 ? ' Yr' : ' Yrs');
                                    }
                                    if ($months !== null && $months > 0) {
                                        $listingAge .= ' ' . $months . ($months == 1 ? ' Mo' : ' Mos');
                                    }
                                } else {
                                    $listingAge = '--';
                                }
                                $listingAge = trim($listingAge);

                                $listingBreed = $product->pro_breed ?? '--';
                                $listingSex = $product->pro_gender ?? '--';
                                
                                $city = $product->pro_city ?? '';
                                $stateStr = $product->per_state ?? $product->pro_state ?? '';
                                $stateCode = '';
                                if ($stateStr && preg_match('/\((.*?)\)/', $stateStr, $matches)) {
                                    $stateCode = strtoupper($matches[1]);
                                } else {
                                    $stateCode = strtoupper($stateStr);
                                }
                                
                                if ($city || $stateCode) {
                                    $listingLocation = trim($city . ($city && $stateCode ? ', ' : '') . $stateCode);
                                }

                                $listingUrl = route('products_detail', $product->pro_sku);
                            }
                        @endphp
                        <div class="conversation-item {{ isset($activeConversation) && $activeConversation->id == $conv->id ? 'conversation-item-active' : '' }}" 
                             onclick="loadMessages({{ $conv->id }}, this)" 
                             data-product-type="{{ $conv->product_type }}"
                             data-listing-name="{{ $listingName }}"
                             data-listing-age="{{ $listingAge }}"
                             data-listing-breed="{{ $listingBreed }}"
                             data-listing-sex="{{ $listingSex }}"
                             data-listing-location="{{ $listingLocation }}"
                             data-listing-url="{{ $listingUrl }}"
                             data-agent-name="{{ $agentName }}"
                             data-company-name="{{ $companyName }}"
                             style="cursor: pointer;">
                            <img src="{{ $otherUser->image ? asset($otherUser->image) : 'https://api.dicebear.com/7.x/avataaars/svg?seed=' . ($otherUser->name ?? 'User') }}" alt="Avatar" class="conversation-avatar">
                            <div class="conversation-details">
                                <div class="conversation-name">{{ $otherUser->name ?? 'Unknown User' }}</div>
                                <div class="listing-name">RE: {{ $listingName }}</div>
                                <div class="conversation-preview">{{ $lastMessage ? Str::limit($lastMessage->message, 30) : 'No messages yet' }}</div>
                            </div>
                            @if($unreadCount > 0)
                                <span class="status-badge-new">{{ $unreadCount }}</span>
                            @else
                                <span class="status-badge-new">New</span>
                            @endif
                        </div>
                    @empty
                        <div class="p-4 text-center text-muted">No conversations found.</div>
                    @endforelse
                </div>

                <div class="chat-main-area">
                    <div id="chat-window" style="{{ isset($activeConversation) ? '' : 'display:none;' }}">
                        <div class="chat-main-area-inner mb-3">
                            <div class="conversation-header">
                                <div class="header-listing-info">
                                    <h2 id="active-listing-name">Select a conversation</h2>
                                    <div class="listing-meta" id="active-listing-meta"></div>
                                </div>
                                <div class="header-listing-action">
                                    <a href="#" id="view-listing-btn" class="view-listing-button" style="display: none;">
                                        View Listing <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="messages-container" id="messages-container" style="height: 500px; overflow-y: auto;">
                                <!-- Messages will be loaded here -->
                            </div>
                        </div>

                        <div class="footer-controls">
                            <form id="send-message-form">
                                @csrf
                                <input type="hidden" name="conversation_id" id="current-conversation-id" value="{{ $activeConversation->id ?? '' }}">
                                <div class="message-input-wrapper mb-3">
                                    <input type="text" name="message" id="message-input" class="message-text-input" placeholder="Type a message..." required>
                                    <button type="submit" class="send-message-button">Send</button>
                                </div>
                                <div class="footer-action-buttons">
                                    <button type="button" class="action-button-reply">Reply</button>
                                    <button type="button" class="action-button-delete">Delete Thread</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="no-chat-selected" style="{{ isset($activeConversation) ? 'display:none;' : '' }}" class="text-center p-5">
                        <div class="chat-main-area-inner p-5 mt-5">
                            <i class="fas fa-comments fa-4x mb-3" style="color: #C6A861;"></i>
                            <h3>Your Messages</h3>
                            <p class="text-muted">Select a conversation from the sidebar to start chatting.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentConvId = {{ $activeConversation->id ?? 'null' }};
        let refreshInterval = null;

        $(document).ready(function() {
            if (currentConvId) {
                const activeItem = $('.conversation-item.conversation-item-active');
                if (activeItem.length) {
                    loadMessages(currentConvId, activeItem[0]);
                }
            }

            $('#send-message-form').on('submit', function(e) {
                e.preventDefault();
                const messageInput = $('#message-input');
                const messageText = messageInput.val().trim();
                if (!messageText) return;

                // Capture form data BEFORE clearing input
                const formData = $(this).serialize();

                // Clear input immediately
                messageInput.val('').focus();

                // Optimistic UI: instantly show message before server responds
                const tempId = 'temp-msg-' + Date.now();
                appendMessage({ message: messageText }, true, tempId);
                scrollBottom();

                // Update sidebar preview immediately
                const sideItem = $(`.conversation-item[onclick*="loadMessages(${currentConvId}"]`);
                if (sideItem.length) {
                    sideItem.find('.conversation-preview').text(messageText.substring(0, 30) + (messageText.length > 30 ? '...' : ''));
                }

                // Send to server in background
                $.post('{{ route("send.message") }}', formData, function(response) {
                    if (response.success) {
                        // Replace temp ID with real ID if needed
                        $('#' + tempId).removeAttr('id'); 
                    } else {
                        $('#' + tempId).remove();
                        // Removed restoration logic to prevent annoying glitches
                    }
                }).fail(function() {
                    $('#' + tempId).remove();
                    // Removed restoration logic to prevent annoying glitches
                });
            });

            // "Reply" button focus input
            $('.action-button-reply').on('click', function() {
                $('#message-input').focus();
            });
        });

        function loadMessages(convId, element) {
            currentConvId = convId;
            $('#current-conversation-id').val(convId);
            $('.conversation-item').removeClass('conversation-item-active');
            $(element).addClass('conversation-item-active');
            
            $('#no-chat-selected').hide();
            $('#chat-window').show();
            
            const productType = $(element).data('product-type');
            const listingName = $(element).data('listing-name');
            const age = $(element).data('listing-age');
            const breed = $(element).data('listing-breed');
            const sex = $(element).data('listing-sex');
            const location = $(element).data('listing-location');
            const url = $(element).data('listing-url');
            const agentName = $(element).data('agent-name');
            const companyName = $(element).data('company-name');

            $('#active-listing-name').text(listingName);
            
            let metaHtml = '';
            if (productType === 'real_estate' || productType === 'services') {
                if (agentName) metaHtml += `<span>${agentName}</span>`;
                if (companyName) metaHtml += `<span class="separator">•</span> <span>${companyName}</span>`;
            } else {
                if (age) metaHtml += `<span>${age}</span>`;
                if (breed) metaHtml += `<span class="separator">•</span> <span>${breed}</span>`;
                if (sex) metaHtml += `<span class="separator">•</span> <span>${sex}</span>`;
                if (location) metaHtml += `<span class="separator">•</span> <span>${location}</span>`;
            }
            
            $('#active-listing-meta').html(metaHtml);
            
            if (url && url !== '#') {
                $('#view-listing-btn').attr('href', url).show();
            } else {
                $('#view-listing-btn').hide();
            }

            $.get('/get-messages/' + convId, function(response) {
                const container = $('#messages-container');
                container.empty();
                response.messages.forEach(msg => {
                    appendMessage(msg, msg.user_id == {{ auth()->id() }});
                });
                scrollBottom();
            });

            if (refreshInterval) clearInterval(refreshInterval);
            refreshInterval = setInterval(fetchNewMessages, 5000);
        }

        function fetchNewMessages() {
            if (!currentConvId) return;
            $.get('/get-messages/' + currentConvId, function(response) {
                const container = $('#messages-container');
                // Only count messages that are not temporary
                const currentCount = container.find('.message-block:not([id^="temp-msg-"])').length;
                
                if (response.messages.length > currentCount) {
                    // Remove optimistic messages before re-rendering to avoid duplicates
                    container.find('[id^="temp-msg-"]').remove();
                    
                    container.empty();
                    response.messages.forEach(msg => {
                        appendMessage(msg, msg.user_id == {{ auth()->id() }});
                    });
                    scrollBottom();
                }
            });
        }

        function appendMessage(msg, isSent, tempId = null) {
            const alignClass = isSent ? 'message-align-right' : 'message-align-left';
            const bubbleClass = isSent ? 'message-bubble-dark' : 'message-bubble-gold';
            const authorHtml = isSent ? '' : `<div class="message-author-name">${$('#active-user-name').text()}</div>`;
            const idAttr = tempId ? `id="${tempId}"` : '';
            
            const html = `
                <div ${idAttr} class="message-block ${alignClass}">
                    ${authorHtml}
                    <div class="message-bubble ${bubbleClass}">
                        ${msg.message}
                    </div>
                </div>
            `;
            $('#messages-container').append(html);
        }

        function scrollBottom() {
            const container = document.getElementById('messages-container');
            if (container) {
                container.scrollTop = container.scrollHeight;
            }
        }
    </script>
@endsection
