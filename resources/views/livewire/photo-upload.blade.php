<div>
    <form class="form-group m-3 p-3" wire:submit.prevent="save">
        <h6 class="my-3">Upload Photo</h6>
        <hr />
        <div class="form-group my-3">
            <input type="hidden" name="college_id" value="<?php echo $student->college_id ?>" />
            <input type="file" wire:model="photo" name="file" class="form-control my-3" accept=".jpg, .jpeg, .png" required />
            @error('photo') <span class="error">{{ $message }}</span> @enderror
            @if ($photo)
            Photo Preview:
            <img src="{{ $photo->temporaryUrl() }}">
            @endif
        </div>
        <button type="submit" class="btn btn-primary my-3">
            Upload Photo
        </button>
        <div style="clear: both"></div>
        <hr />
        <button type="button" class="btn btn-link btn-lg btn-upload" style="font-size: 40px; text-decoration: none">
            <span data-feather="printer"></span>
            Print Card
        </button>
    </form>
</div>