<style>
    .points_modal .modal-title {
        font-size: 25px;
        font-weight: 700;
        text-align: center;
        margin: 0;
        color: white;
        line-height: 1;
        text-transform: uppercase;
        text-shadow: -1px 0 0 #ba9148, 1px 0 0 #ba9148, 0 -1px 0 #ba9148, 0 1px 0 #ba9148, -1px -1px 0 #ba9148, 1px -1px 0 #ba9148, -1px 1px 0 #ba9148, 1px 1px 0 #ba9148;
    }
    .points_modal .modal-header {
        background: #181E39;
    }
    .points_modal .modal-content {
        background-color: #fff;
        border: 2px solid #fff;
        border-radius: 10px;
        overflow: hidden;
        background: #181E39;
    }
    .points_modal .modal-dialog {
        position: relative;
        width: auto;
        margin: 0;
        pointer-events: none;
        position: absolute;
        top: 120px;
        right: 45px;
        min-height: auto !important;
        max-width: 340px;
        width: 100%;
    }

    /* Hide the backdrop */
    .modal-backdrop {
        display: none !important;
    }
    .points_modal .modal-body h5, .points_modal .modal-body p {
        color: #fff;
    }
    .points_modal .close_btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #fff;
        width: 20px;
        height: 20px;
        border: 0;
        border-radius: 5px;
        font-size: 12px;
        background: linear-gradient(180deg, #FCFAF4 13.33%, #C5A266 100%);
    }
    .points_modal hr {
        color: #fff;
    }
    @media only screen and (max-width: 1799px) {
        .points_modal .modal-dialog {
            top: 110px;
            right: 20px;
        }
    }
</style>

<div>
    <!-- Points Modal -->
    <div class="modal fade points_modal" id="pointsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title">Your Credits</h3>
                    <button type="button" class="close_btn" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                </div>

                <div class="modal-body">
                    <h5 class="mb-2">Total Show Points</h5>
                    <p class="mb-0">You have {{ $totalCredits ?? '0' }} Points.</p>
                    <hr>
                    <h5 class="mb-2">Used Show Points</h5>
                    <p class="mb-0">You have used {{ max(0, ($totalCredits ?? 0) - ($remainingToken ?? 0)) }} Points.</p>
                    <hr>
                    <h5 class="mb-2">Remaining Show Points</h5>
                    <p class="mb-0">You have remaining {{ $remainingToken ?? '0' }} Points.</p>
                    <hr>
                    <h5 class="mb-2">⭐ {{ $credits->credits_balance ?? 0 }} E-Credits</h5>
                    <p class="mb-0">You have {{ $credits->credits_balance ?? 0 }} points as Credits.</p>

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
