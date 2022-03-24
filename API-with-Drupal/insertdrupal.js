function storedata() {
    let utitle = document.getElementById("utitle").value;
    let ubody = document.getElementById("ubody").value;

    let user = {
        _links: { type: { href: "http://localhost/drupal-9.3.0/rest/type/node/page" } },
        type: { target_id: "page" },
        title: { value: utitle },
        body: { value: ubody },
    };
    const options = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(user),
    };
    fetch("http://localhost/drupal-9.3.0/node?_format=json", options)
        .then((response) => response.json())
        .then((data) => {
            if (data.message) {
                alert("hello " + data.message);
                // let main = document.querySelector("#main");
                // main.innerHTML = "Welcome " + data.current_user.name;
            } else {
                let main = document.querySelector("#main");
                main.innerHTML = "Data Inserted";
            }
        });
}