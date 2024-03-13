    <form action="">
        <div class="input-field">
            <input type="text" name="post-title" placeholder="Article Title" id="postTitle" />
        </div>
        <div class="add-cover">
            <input type="file" name="cover" id="coverImgUpload" />
            <div class="cover-upload-btn">
                <button id="uploadCover" class="primary-btn" type="button">
                    <i class="fa-solid fa-upload"></i>Upload Cover Image
                </button>
                <button id="removeCover" class="primary-btn" type="button">
                    <i class="fa-solid fa-trash"></i>Remove
                </button>
            </div>
            <img class="cover-img">
        </div>

        <dialog class="url-input">
            <div class="max-width">
                <div class="input-field">
                    <input type="text" name="url-input" placeholder="Image URL" id="imageUrl" />
                </div>
                <button id="confirmUrl" class="primary-btn" type="button">Confirm</button>
            </div>
        </dialog>


        <div id="toolbar">
            <!-- Add a bold button -->
            <button class="ql-bold "><strong>B</strong></button>|
            <!-- Add a italic button -->
            <button class="ql-italic"><i class="fa-solid fa-italic"></i></button>|
            <!-- Add a link button -->
            <button class="ql-link"><i class="fa-solid fa-link"></i></button>|
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
    </form>