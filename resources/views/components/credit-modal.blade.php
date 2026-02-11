<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->

    <!-- Points Modal -->
    <div class="modal fade" id="pointsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Your Credits</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <h3 class="mb-2">⭐ {{ $credits->credits_balance ?? 0 }} Points</h3>
                    <p class="mb-0">You have {{ $credits->credits_balance ?? 0 }} points as Credits.</p>

                    <hr>

                    {{-- <ul class="list-unstyled">
                        <li>✅ Signup Bonus: 50</li>
                        <li>✅ Daily Login: 30</li>
                        <li>✅ Referral Bonus: 40</li>
                    </ul> --}}

                    <!-- Use Credit Button -->
                    <form action="{{ url('use-credits') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" @disabled(!($credits && $credits->credits_balance >= 2)) class="btn btn-primary mt-3">
                            Use Credit
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
