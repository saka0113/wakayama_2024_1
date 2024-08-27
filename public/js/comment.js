document.addEventListener('DOMContentLoaded', function () {
    // コメントボタンがクリックされたときの処理
    var commentButtons = document.querySelectorAll('.comment_button');
    commentButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        var articleId = this.getAttribute('data-article-id');
        document.getElementById('articleId').value = articleId;
        var popup = document.getElementById('commentPopup');
        popup.style.display = 'flex';
      });
    });

    // ポップアップを閉じる処理
    var commentPopup = document.getElementById('commentPopup');
    commentPopup.addEventListener('click', function (event) {
      if (event.target === this) {
        this.style.display = 'none';
      }
    });
  });