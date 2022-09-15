var data = 'aaaaaa';


fetch('/test', { // 第1引数に送り先
    method: 'POST', // メソッド指定
    headers: { 'Content-Type': 'application/json',
                "X-Requested-With": "XMLHttpRequest", 
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    }, // jsonを指定
    body: JSON.stringify(data) // json形式に変換して添付
})



