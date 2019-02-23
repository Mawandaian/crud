<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyFarmCRUD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/modal.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/modalform.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/dropdown.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/card.css') }}" />
    </head>
    <body>
        <div class="side_div"> </div>

        <div class="main_div">
            <div class="trigger" onclick="refreshForm('{{URL::to('/create_post')}}')">Create New Post</div>
            <br /><br />


            <script>
                let post = Array();
            </script>

            @foreach ($database_data as $data)

                <div class="card">
                    <div class="card-header">
                        <b class="heading">{{ $data->post_title }} </b>
                        <div class="dropdown">
                            <button onclick="dropLinks({{$data->post_id}})" class="dropbtn">Options</button>
                            <div id="myDropdown{{$data->post_id}}" class="dropdown-content">
                                <a onclick='updateForm("{{$data->post_id}}")' href="#">Update</a>
                                <a href="{{URL::to('/delete_post')}}?id={{$data->post_id}}">Delete</a>
                            </div>
                        </div>
                    </div>
                    <b class="timestamp">Posted: {{ $data->timestamps }}</b>

                    <div class="card-body">
                        {{ $data->post_body }}
                    </div>
                </div>

                <script>
                    post['title{{$data->post_id}}'] = '{{$data->post_title}}';
                    post['body{{$data->post_id}}'] = '{{$data->post_body}}';
                    post['url{{$data->post_id}}'] = '{{URL::to("/update_post")}}';
                </script>
                <br />
                <br />
            @endforeach


            <div class="modal">
                <div class="modal-content">
                    <span class="close-button">×</span>
                    <div id="full_form">
                        <form action="{{URL::to('/create_post')}}" id="post_form" method="POST">
                            <h1 id="form_heading">Create New Post</h1>
                            <input type="text" name="post_title" id="post_title" placeholder="Enter Post Title" required />
                            <textarea name="post_body" id="post_body" placeholder="Enter Post Here" required></textarea>
                            <input type="hidden" name="id" id="id" value="" />
                            <input type="hidden" name="token" value="{{csrf_token()}}" required />
                            <input type="submit" name="add_post" id="add_post" value="Add Post" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="side_div"> </div>


        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ URL::asset('js/modal.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/dropdown.js') }}"></script>
    
</body>
</html>
