const data = 'Hello World！'; // 渡したいデータ（配列やオブジェクトでも可）

fetch('/test', { // 第1引数に送り先
    method: 'POST', // メソッド指定
    headers: { 'Content-Type': 'application/json' }, // jsonを指定
    body: JSON.stringify(data) // json形式に変換して添付
})



