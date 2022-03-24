function getdata() {
    fetch("http://localhost/drupal-9.3.0/api/v1/pageview?_format=json", {
            method: "GET",
            headers: {
                "Context-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then(function(data) {
            //console.log(data);
            let fulldata = '<table border=2><tr><th>ID</th><th>Title</th><th>Body</th></tr>';
            data.forEach(function(pages) {
                fulldata += `<tr><td>${pages.nid}</td><td>${pages.title}</td><td>${pages.body}</td></tr>`;
            });
            fulldata += `</table>`;
            document.getElementById('main').innerHTML = fulldata;
        });

}