    window.onload = function(){
        /*各画面オブジェクト*/
        const btnSubmit = document.getElementById('btnSubmit');
        const inputName = document.getElementById('name');
        const inputKana = document.getElementById('kana');
        const inputTel = document.getElementById('tel');
        const inputEmail = document.getElementById('email');
        const inputBody = document.getElementById('body');
        const reg = /^[a-zA-Z0-9_+-]+(\.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
        const reg2= /^(0{1}\d{9,10})$/;
        
        
        btnSubmit.addEventListener('click', function(event) {
            console.log(inputEmail.value);
            let message = [];
            /*入力値チェック*/
            if(inputName.value ==""){
                message.push("氏名が未入力です。");
            }else if(inputName.value.length > 10){
                message.push("10文字以内で入力してください。");
            }
            if(inputKana.value ==""){
                message.push("フリガナが未入力です。");
            }else if(inputKana.value.length > 10){
                message.push("10文字以内で入力してください。");
            }
            if(!reg2.test(inputTel.value) && inputTel.value.length > 0){
                message.push("数字で入力してください。");
            }
            if(inputEmail.value ==""){
                message.push("メールアドレスが未入力です。");
            }else if(!reg.test(inputEmail.value)){
                message.push("メールアドレスの形式が不正です。");
            }
            if(inputBody.value ==""){
                message.push("入力は必須です。");
            }
            if(message.length > 0){
                alert(message);
                return;
            }
            document.contact.submit();
        });
    };