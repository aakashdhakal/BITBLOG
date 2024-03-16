    <form action="">
        <div class="add-cover">
            <input type="file" name="cover" id="coverImgUpload" />

            <div class="cover-upload-btn">

                <button id="uploadCover" class="secondary-btn" type="button">
                    <i class="fa-solid fa-up-from-bracket"></i>Upload Cover
                </button>
                <button id="removeCover" class="secondary-btn" type="button">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
            <div class="cover-details">
                <i class="fa-solid fa-image-landscape"></i><br>
                <p>Drag and drop or click to upload</p>
                <p>Recommended size is 1200 x 600px</p>

            </div>
            <img class="cover-img">
        </div>
        <div class="input-field">
            <input type="text" name="post-title" placeholder="Article Title" id="postTitle" autocomplete="off" />
        </div>
        <div id="toolbar">
            <!-- Add a bold button -->
            <button class="ql-bold "><strong>B</strong></button>|
            <!-- Add a italic button -->
            <button class="ql-italic"><i class="fa-solid fa-italic"></i></button>|
            <!-- Add a link button -->
            <button class="ql-link"><i class="fa-solid fa-link"></i></button>|
            <dialog class="url-input">
                <div class="max-width">
                    <div class="input-field">
                        <input type="text" name="url-input" placeholder="URL" id="linkUrl" />
                    </div>
                    <button id="confirmUrl" class="primary-btn" type="button">Insert</button>
                </div>
            </dialog>
            <!-- Add a blockquote button -->
            <button class="ql-blockquote"><i class="fa-solid fa-quote-left"></i></button>|
            <!-- Add a code button -->

            <button class="ql-code-block"><i class="fa-solid fa-code"></i></button>|
            <!-- Add a list button -->
            <button class="ql-list" value="ordered"><i class="fa-solid fa-list-ol"></i></button>|
            <button class="ql-list" value="bullet"><i class="fa-solid fa-list-ul"></i></button>|
            <!-- Add a header button -->
            <button class="ql-header" value="1"><strong>H1</strong></button>|
            <button class="ql-header" value="2"><strong>H2</strong></button>|
            <button class="ql-header" value="3"><strong>H3</strong></button>|

            <!-- Add subscript and superscript buttons -->
            <button class="ql-script" value="sub"><i class="fa-solid fa-subscript"></i></button>|
            <button class="ql-script" value="super"><i class="fa-solid fa-superscript"></i></button>|
            <!-- Add a button to clean the editor -->
            <button class="ql-clean"><i class="fa-solid fa-eraser"></i></button>
        </div>

        <div id="editor">

        </div>
        <div class="category">
            <div class="input-field">
                <input type="text" name="category" placeholder="Category" id="category" />

            </div>

        </div>
        <div class="post-buttons">
            <button id="saveDraft" class="secondary-btn" type="button">Save Draft</button>
            <button id="publishPost" class="primary-btn" type="button">Publish</button>
        </div>
    </form>