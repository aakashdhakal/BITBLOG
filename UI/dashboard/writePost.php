    <form action="">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="">
        </div>
        <div class="form-group">
            <label for="image">Thumbnail</label>
            <input type="file" class="form-control" id="image">
        </div>

        <section class="editor-container">
            <div id="toolbar">
                <!-- Add a bold button -->
                <button class="ql-bold "><strong>B</strong></button>
                <!-- Add a italic button -->
                <button class="ql-italic"><i class="fa-solid fa-italic"></i></button>
                <!-- Add a link button -->
                <button class="ql-link"><i class="fa-solid fa-link"></i></button>
                <!-- Add a blockquote button -->
                <button class="ql-blockquote"><i class="fa-solid fa-quote-left"></i></button>
                <!-- Add a code button -->

                <button class="ql-code-block"><i class="fa-solid fa-code"></i></button>
                <!-- Add a image button -->

                <button class="ql-image"><i class="fa-solid fa-image"></i></button>
                <!-- Add a list button -->
                <button class="ql-list" value="ordered"><i class="fa-solid fa-list-ol"></i></button>
                <button class="ql-list" value="bullet"><i class="fa-solid fa-list-ul"></i></button>
                <!-- Add a header button -->
                <button class="ql-header" value="1"><strong>H1</strong></button>
                <button class="ql-header" value="2"><strong>H2</strong></button>
                <button class="ql-header" value="3"><strong>H3</strong></button>

                <!-- Add subscript and superscript buttons -->
                <button class="ql-script" value="sub">
                    <i class="fa-solid fa-subscript"></i>
                </button>
                <button class="ql-script" value="super">
                    <i class="fa-solid fa-superscript"></i>
                </button>
                <!-- Add a button to clean the editor -->
                <button class="ql-clean"><i class="fa-solid fa-eraser"></i></button>
            </div>

            <div id="editor">

            </div>
        </section>
    </form>