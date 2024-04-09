    <div class="write-post">
        <form action="">
            <div class="add-cover">
                <input type="file" name="cover" id="coverImgUpload" />
                <div class="cover-upload-btn">
                    <button id="uploadCover" class="tertiary-btn" type="button">
                        <i class="fa-regular fa-image"></i>Add Cover
                    </button>
                    <button id="removeCover" class="secondary-btn" type="button">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>

                <img class="cover-img">
            </div>
            <div class="input-field">
                <div placeholder="Article Title.." id="postTitle" contenteditable="true"></div>
            </div>
            <div class="custom-select">
                <input type="text" class="custom-select-display" placeholder="Write category or topic in a word.." id="postCategory" autocomplete="off">
                <ul class="custom-options">
                </ul>
            </div>
            <div class="write-blog">
                <div id="toolbar">
                    <button class="ql-bold" title="Bold"><strong>B</strong></button>|
                    <button class="ql-italic" title="Italic"><i class="fa-solid fa-italic"></i></button>|
                    <button class="ql-strike" title="Strike"><i class="fa-solid fa-strikethrough"></i></button>|
                    <button class="ql-underline" title="Underline"><i class="fa-solid fa-underline"></i></button>|
                    <button class="ql-header" value="1" title="Header 1"><strong>H1</strong></button>|
                    <button class="ql-header" value="2" title="Header 2"><strong>H2</strong></button>|
                    <button class="ql-header" value="3" title="Header 3"><strong>H3</strong></button>|
                    <button class="ql-script" value="sub" title="Subscript"><i class="fa-solid fa-subscript"></i></button>|
                    <button class="ql-script" value="super" title="Superscript"><i class="fa-solid fa-superscript"></i></button>|
                    <button class="ql-list" value="ordered" title="Ordered List"><i class="fa-solid fa-list-ol"></i></button>|
                    <button class="ql-list" value="bullet" title="Bullet List"><i class="fa-solid fa-list-ul"></i></button>|
                    <button class="ql-indent" value="+1" title="Increase Indent"><i class="fa-solid fa-indent"></i></button>|
                    <button class="ql-indent" value="-1" title="Decrease Indent"><i class="fa-solid fa-outdent"></i></button>|
                    <button class="ql-align" value="left" title="Align Left"><i class="fa-solid fa-align-left"></i></button>|
                    <button class="ql-align" value="center" title="Align Center"><i class="fa-solid fa-align-center"></i></button>|
                    <button class="ql-align" value="right" title="Align Right"><i class="fa-solid fa-align-right"></i></button>|
                    <button class="ql-align" value="justify" title="Justify"><i class="fa-solid fa-align-justify"></i></button>|
                    <button class="ql-link" title="Link"><i class="fa-solid fa-link"></i></button>|
                    <dialog class="url-input input-dialog">
                        <div class="max-width">
                            <div class="input-field">
                                <input type="text" name="url-input" placeholder="Type or paste URL" id="linkUrl" autocomplete="off" />
                            </div>
                            <button id="cancelUrl" class="tertiary-btn" type="button" title="Cancel"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </dialog>
                    <button class="ql-formula" title="Formula"><i class="fa-solid fa-function"></i></button>|
                    <dialog class="formula-input input-dialog">
                        <div class="max-width">
                            <div class="input-field">
                                <input type="text" name="url-input" placeholder="Type or paste formula" id="linkUrl" autocomplete="off" />
                            </div>
                            <button id="cancelUrl" class="tertiary-btn" type="button" title="Cancel"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </dialog>
                    <button class="ql-image" title="Insert Image"><i class="fa-solid fa-image"></i></button>|
                    <dialog class="image-input input-dialog">
                        <div class="max-width">
                            <div class="file-upload">
                                <button class="file-select-button tertairy-btn" type="button"><i class="fa-solid fa-up-to-bracket"></i>Upload Image
                                </button>
                                <input type="file" name="" id="">
                                OR
                                <div class="input-field">
                                    <input type="text" name="url-input" placeholder="Type or paste image URL" id="imageLinkUrl" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                    </dialog>
                    <button class="ql-blockquote" title="Blockquote"><i class="fa-solid fa-quote-left"></i></button>|
                    <button class="ql-code-block" title="Code Block"><i class="fa-solid fa-code"></i></button>|


                    <button class="ql-clean" title="Remove Formatting"><i class="fa-solid fa-eraser"></i></button>
                </div>
                <div id="editor"></div>
            </div>
            <div class="post-buttons">
                <button id="saveDraft" class="secondary-btn" type="button">Save Draft</button>
                <button id="publishPost" class="primary-btn" type="button">Publish</button>
            </div>


            <!-- <div class="add-cover">
                <input type="file" name="cover" id="coverImgUpload" />
                <div class="cover-upload-btn">
                    <button id="uploadCover" class="secondary-btn" type="button">
                        <i class="fa-regular fa-image"></i>Add Cover
                    </button>
                    <button id="removeCover" class="secondary-btn" type="button">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>

                <img class="cover-img">
            </div>
            <div class="input-field">
                <div placeholder="Article Title.." id="postTitle" contenteditable="true"></div>
            </div>
           
            <div id="toolbar">
    
                <button class="ql-bold "><strong>B</strong></button>|
   
                <button class="ql-italic"><i class="fa-solid fa-italic"></i></button>|

                <button class="ql-link"><i class="fa-solid fa-link"></i></button>|
                <dialog class="url-input">
                    <div class="max-width">
                        <div class="input-field">
                            <input type="text" name="url-input" placeholder="Type or paste URL" id="linkUrl" />
                        </div>
                        <button id="cancelUrl" class="tertiary-btn" type="button"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </dialog>
                <button class="ql-blockquote"><i class="fa-solid fa-quote-left"></i></button>|

                <button class="ql-code-block"><i class="fa-solid fa-code"></i></button>|
                <button class="ql-list" value="ordered"><i class="fa-solid fa-list-ol"></i></button>|
                <button class="ql-list" value="bullet"><i class="fa-solid fa-list-ul"></i></button>|
                <button class="ql-header" value="1"><strong>H1</strong></button>|
                <button class="ql-header" value="2"><strong>H2</strong></button>|
                <button class="ql-header" value="3"><strong>H3</strong></button>|

                <button class="ql-script" value="sub"><i class="fa-solid fa-subscript"></i></button>|
                <button class="ql-script" value="super"><i class="fa-solid fa-superscript"></i></button>|
                <button class="ql-clean"><i class="fa-solid fa-eraser"></i></button>
            </div>

            <div id="editor">

            </div>

            -->
        </form>
    </div>