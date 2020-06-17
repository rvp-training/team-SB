$(function(){
    $('.js-modal-open').on('click',function(){
        $('.js-modal').fadeIn();
        return false;
    });

    $('.js-modal-close').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    });

    $('.js-modal-open').on('click',function(){
 
        // prop()でチェックの状態を取得
        var bussiness = $('#bussiness').prop('checked');
        var private = $('#private').prop('checked');
         
     
        // もしbussinessがチェック状態だったら
        if (bussiness) {
          // ビジネスカテゴリを選択中ですと出力
          $('#category_message').text('ビジネスカテゴリを選択中です');
        } else if (private)  {
          // プライベートカテゴリを選択中ですと出力
            $('#category_message').text('プライベートカテゴリを選択中です');
        } else {
          // テキストをリセット
          $('#category_message').text('');
        }
     
    });

});