<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}" />

    <title>kadai-app | 投稿詳細</title>
</head>
<!-- 投稿詳細画面 -->

<body class="">
    <x-header></x-header>

    <div class="page post-detail-page">
        @if ($parentPost)
        <div class="parentPost">
            <a href="/user/{{ $parentPost->user()->id }}">
                <div class="user-info">
                    <img class="user-icon" src="{{ asset('/img/user_icon.png') }}" alt="" />
                    <div class="user-name">{{ $parentPost->user()->name}}</div>
                </div>  
            </a>
            <a href="/post/detail/{{ $parentPost->id }}">
               <div class="pearentpost">{{ $parentPost->content }}</div>
               <div class="time-stamp">{{ $parentPost->created_at }}</div>
           </a>
        </div>
        @endif
        <div class="post">
            <a href="/user/{{ $user->id }}">
                <div class="user-info">
                    <img class="user-icon" src="{{ asset('/img/user_icon.png') }}" alt="" />
                    <div class="user-name">{{ $user->name }}</div>
                </div>
                <div class="content">{{ $post->content }}</div>
                <div class="time-stamp">{{ $post->created_at }}</div>
            </a>
            @if ($isOwnPost)
            <div class="menu">
                <div class="menu-item font-blue">
                    <a href="/post/edit/{{ $post->id }}">編集</a>
                </div>
                <form name="delete" action="/post/delete/{{ $post->id }}" method="post">
                    @csrf
                     <div class="menu-item font-red" onclick="deletePost()">
                        削除
                    </div>
                </form>
            </div>
            @endif
        </div>
        <div class="replysousin">
        <form class="form" action="/post" method="post">
            @csrf
            <textarea name="postContent" id="" cols="30" rows="5" placeholder="リプライ"></textarea>
            <input type="hidden" name="reply_to" value="0"/>
            <input type="hidden" name="parent_id" value="1"/>
            <div class="post-button">
                <button class="button-white" type="submit">リプライ</button>
            </div>
        </form>
     </div>
        @foreach ($replies as $reply)
        <div class="reply">
            <a href="/user/{{ $reply->user()->id }}">
                <div class="user-info">
                    <img class="user-icon" src="{{ asset('/img/user_icon.png') }}" alt="" />
                    <div class="user-name">{{ $reply->user()->name}}</div>
                </div>  
            </a>
            <a href="/post/detail/{{ $reply->id }}">
               <div class="reply">{{ $reply->content }}</div>
               <div class="time-stamp">{{ $reply->created_at }}</div>
           </a>
        </div>    
        @endforeach
    </div>
 </body>
<x-footer></x-footer>
<script src="{{ asset('/js/app.js') }}"></script>
<script>
    function deletePost() {
        if (confirm("削除しますか?")) {
            document.delete.submit();
        }
    }
</script>
<style scoped>
    .post-detail-page .user-icon {
        width: 50px;
        height: 50px;
    }
    
    .post-detail-page .user-info {
        display: flex;
    }
    
    .post-detail-page .user-name {
        line-height: 50px;
        font-size: 18px;
    }
    
    .post-detail-page .time-stamp {
        text-align: end;
        font-size: 14px;
    }
    
    .post-detail-page .post {
        padding: 0 10px;
    }
    
    .post-detail-page .menu {
        display: flex;
        justify-content: end;
    }
    
    .post-detail-page .menu-item {
        font-size: 16px;
        margin: 0 2px;
    }
    
    .post-detail-page .menu-item {
        font-size: 16px;
        margin: 0 2px;
    }
    
    .post-detail-page .menu-item {
        font-size: 16px;
        margin: 0 2px;
    }
    
    .post-detail-page .content {
        word-wrap: break-word;
    }
</style>

</html>