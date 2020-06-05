
    $('form').validate({
        errorElement: "span",
        errorClass: "alert",
        rules: {
            name: {
                required: true,
                maxlength: 30
            },
            department: {
                required: true,
                maxlength: 15
            },
            position: {
                required: true,
                maxlength: 15
            },
            mail: {
                required: true,
                email : true
            },
            pass: {
                required: true,
                maxlength: 45
            },
        },

    messages: {
        name: {
            required: "氏名を入力してください",
            maxlength: "氏名は30文字以内で入力してください"
        }
    },
        department: {
            required: "部署を入力してください",
            maxlength: "部署は15文字以内で入力してください"
        }
    },
        position: {
            required: "役職を入力してください",
            maxlength: "役職は15文字以内で入力してください"
        }
    },
        mail: {
            required: "メールアドレスを入力してください",
            email : "正式なメールアドレスを入力してください",
            maxlength: "メールアドレスは45文字以内で入力してください"
        }
    },
        pass: {
            required: "パスワードを入力してください",
            maxlength: "パスワードは45文字以内で入力してください"
        }
    }
});