    @extends('backend.layout.app')
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @section('content')
    <br><div class="col-12">
        <form class="card shadow-sm border border-secondary" method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data" style="max-width: 1000px; margin: 0 auto;">
            @csrf
            @method('PUT')
            <div class="card-body p-3">
                <h3 class="text-center mb-3">Edit Service</h3>

                <div class="row g-3">
                    <!-- Product Name -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}" placeholder="Enter service title" required>
                    </div>

                    <!-- Category -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Category</label>
                        <select class="form-control" name="category_id" required>
                            <option value="" disabled>Select a category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Price (৳)</label>
                        <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" placeholder="Enter price" step="0.01" min="0" required>
                    </div>

                <!-- Time -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Time (minutes)</label>
                    <input type="text" id="timepicker"
                        name="time"
                        value="{{ old('time', $product->time) }}"
                        class="form-control"
                        placeholder="Enter time" required>
                </div>


                    <!-- Thumbnail -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Thumbnail Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <small class="text-muted">JPEG, PNG formats recommended. Current: <img src="{{ asset($product->image) }}" style="max-width: 100px;" alt="Product Thumbnail"></small>
                    </div>

                    <!-- Product Images -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Additional Images</label>
                        <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                        <small class="text-muted d-block mb-2">You can upload multiple images.</small>

                        <div id="existing-images" class="mt-2 d-flex flex-wrap">
                            @foreach($product->images as $img)
                                <div class="position-relative me-2 mb-2 image-wrapper" style="display:inline-block;">
                                    <img src="{{ asset($img->images) }}"
                                        alt="Product Image"
                                        style="max-width: 100px; height:100px; object-fit:cover; border-radius:6px;">
                                    <button type="button"
                                            class="btn btn-sm btn-danger remove-image-btn"
                                            data-id="{{ $img->id }}"
                                            style="padding:2px 6px; font-size:12px; border-radius:50%; position:absolute; top:0; right:0;">
                                        ×
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <!-- Hidden field to store IDs of images to remove -->
                        <input type="hidden" name="remove_images" id="remove-images-input" value="">
                    </div>

                <!-- Short Description -->
                <div class="col-md-12">
                    <label class="form-label fw-semibold">Short Description</label>
                    <textarea name="short_description" rows="3" {{ old('short_description', $product->short_description) }} class="form-control text-editor" placeholder="Write a short summary..." required></textarea>
                </div>

                    <!-- Description -->
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Product Description</label>
                        <textarea name="description" rows="3" class="form-control" placeholder="Write a short description..." required>{{ old('description', $product->description) }}</textarea>
                    </div>


                    <!-- Status -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="" disabled>Select status</option>
                            <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <!-- Is Popular -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Popular Product?</label>
                        <select name="is_popular" class="form-control" required>
                            <option value="" disabled selected>Select option</option>
                            <option value="1" {{ $product->is_popular == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $product->is_popular == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>


                </div>
            </div>

            <div class="card-footer bg-white text-end py-3">
                <button type="submit" class="btn btn-primary px-4">Update Product</button>
            </div>
        </form>
    </div>
    @endsection

    @push('scripts')

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $("#timepicker").TouchSpin({
            min: 0,
            max: 500,   // you can adjust max minutes
            step: 5,    // increases in 5-minute steps
            boostat: 20,
            maxboostedstep: 30,
            postfix: 'min'
        });
    </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const removeImagesInput = document.getElementById("remove-images-input");
        let removeIds = [];
        let confirmed = false; // confirm only once per page load

        document.querySelectorAll(".remove-image-btn").forEach(button => {
            button.addEventListener("click", function () {
                const imageId = this.getAttribute("data-id");


                // Remove the image from DOM
                this.closest(".image-wrapper").remove();

                // Add the image ID to removal list if not already added
                if (!removeIds.includes(imageId)) {
                    removeIds.push(imageId);
                }

                // Update hidden input
                removeImagesInput.value = removeIds.join(",");
            });
        });
    });
    </script>



    @endpush
