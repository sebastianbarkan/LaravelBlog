<x-standard_layout>
    <p class="text-create-post-label">Create a post</p>
    <div class="choose-community-wrap">
        <span class="span-community-label">
            <span class="span-choose-community-img-placeholder">
            </span>
            <p class="text-choose-community">Choose a community</p>
        </span>
        <i class="fa-solid fa-angle-down icon-choose-community"></i>
    </div>
    <div class="create-post-wrap">
        <div class="create-post-type-btn-wrap">
            <button class="btn-create-post-type post-type-selected" id="post-type-btn" onclick="selectPostType()">
                <i class="fa-solid fa-file-lines icon-create-post-type"></i>
                <p class="text-create-post-type">Post</p>
            </button>
            <button class="btn-create-post-type-center"  id="media-post-type-btn" onclick="selectMediaPostType()">
                <i class="fa-regular fa-image icon-create-post-type"></i>
                <p class="text-create-post-type">Image</p>
            </button>
            <button class="btn-create-post-type" id="link-post-type-btn" onclick="selectLinkPostType()">
                <i class="fa-solid fa-link icon-create-post-type"></i>
                <p class="text-create-post-type">Link</p>
            </button>
        </div>
        <form class="form-create-post" method="POST">
            @csrf
            
            <div class="create-post-textarea-wrap">
                <textarea name="title" id="" cols="30" rows="10" class="textarea-title-create-post" placeholder="Title"></textarea>
            </div>

            <div class="create-post-inputs-wrap" id="post-type">
                <div class="create-post-textarea-wrap">
                    <textarea name="content" id="" cols="30" rows="10" class="textarea-content-create-post" placeholder="Text (optional)"></textarea>
                </div>
            </div>

            <div class="create-media-post-inputs-wrap hidden" id="media-post-type">
                <div class="create-post-textarea-wrap">
                        <input
                            type="file"
                            class="input-create-post-img"
                            name="create-post-img"
                        />
                        @error("create-post-img")
                            <p class="text-error-message">{{$message}}</p>
                        @enderror
                </div>
            </div>

            <div class="create-link-post-inputs-wrap hidden"  id="link-post-type">
                <div class="create-post-textarea-wrap">
                    <input name="create-link-post" type="text" class="input-create-link-post" placeholder="Url">
                </div>
            </div>

            <div class="create-post-flair-wrap">
                <button class="btn-create-post-flair">
                    <i class="fa-solid fa-plus icon-create-post-flair"></i>
                    <p class="txt-create-post-flair-btn">OC</p>
                </button>
                <button class="btn-create-post-flair">
                    <i class="fa-solid fa-plus icon-create-post-flair"></i>
                    <p class="txt-create-post-flair-btn">Spoiler</p>
                </button>
                <button class="btn-create-post-flair">
                    <i class="fa-solid fa-plus icon-create-post-flair"></i>
                    <p class="txt-create-post-flair-btn">NSFW</p>
                </button>
            </div>
            <hr class="hr-create-post">
            <div class="action-btns-create-post-wrap">
                <button class="btn-save-draft-create-post">Save Draft</button>
                <button class="btn-post-create-post">Post</button>
            </div>
        </form>
    </div>
</x-standard_layout>