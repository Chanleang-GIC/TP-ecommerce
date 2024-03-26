<html>
    <head>
        <style>
            .center {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div>
            @include("todo.list")
            <form method="post" action="/todo/store" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>Task: <input type="text" name="task" /> <br/></tr>
                    <tr>Description: <textarea name="description"></textarea> <br/></tr>
                    <tr>Image: <input type="file" name="image" /></tr>
                    <tr></tr>
                </table>

                <div>
                    <button type="submit">Save Task</button>
                    <a href="/todo">
                        <button type="button">Cancel</button>
                    </a>
                </div>
            </form>
        </div>
    </body>
</html>