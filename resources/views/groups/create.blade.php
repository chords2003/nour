
<!-- Include Axios -->
{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const createGroupForm = document.getElementById('createGroupForm');

        createGroupForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            const url = this.getAttribute('action');

            // Get form data
            const formData = new FormData(this);

            axios.post(url, formData)
                .then(response => {
                    // Handle the success response
                    alert(response.data.message);
                    // You can close the modal or perform other actions here
                    $('#createGroupModal').modal('hide');
                })
                .catch(error => {
                    // Handle the error response
                    console.error(error);
                });
        });
    });
</script> --}}




    <div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="createGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createGroupModalLabel">Create New Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create a form for group creation -->
                <form id="createGroupForm" action="{{ route('groups.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Laravel CSRF token -->
                    {{-- Title --}}
                    <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    {{-- description --}}
                    <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    {{-- image file --}}
                    <div class="form-group">
                        <label for="image">Group Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                     </div>

                    <!-- Add any other form elements as needed -->

                    <button type="submit" class="btn btn-primary">Create Group</button>
                </form>
            </div>
        </div>
        </div>
    </div>


