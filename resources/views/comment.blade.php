<button class="comment_button" data-article-id="{{ $article->id }}">
<img src="{{ asset('images/comment.svg') }}" alt="コメントアイコン" class="comment-icon">
</button>

<style>
    .comment_button{
        margin-left:7px;

    }

    .comment-icon {
        width: 32px; /* 画像の幅 */
        height: 32px; /* 画像の高さ */
        
        
    }
  </style>