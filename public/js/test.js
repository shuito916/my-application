function postForm(value) {
 
    var form = document.createElement('form');
    var request = document.createElement('input');
 
    form.method = 'POST';
    form.action = '/test2';
 
    request.type = 'hidden'; //入力フォームが表示されないように
    request.name = 'ABC';
    request.value = value;
 
    form.appendChild(request);
    document.body.appendChild(form);
 
    form.submit();
 
}

var data = 'gmargm;';
postForm(data);