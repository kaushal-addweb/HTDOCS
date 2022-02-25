function senddata() {
    let fname = document.querySelector("input[name='firstname']").value;
    let mail = document.querySelector("input[name='email']").value;
    let password = document.querySelector("input[name='password']").value;
    let div = document.querySelector("#detail");

    div.innerHTML = "Sending Data....";

    let user = {
        _links: { type: { href: "http://localhost/drupal-9.3.0/rest/type/user/user" } },
        name: { value: fname },
        mail: { value: mail },
        pass: { value: password },
        status: { value: "1" }
    };
    const options = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(user),
    };

    fetch("http://localhost/drupal-9.3.0/user/register?_format=json", options)
        .then((response) => {
            if (response.status !== 200) {
                console.log("Error:" + response.statusText);
                throw new Error(`${response.status}`);
            } else {
                return response.json();
            }
        })
        .then((user) => {
            console.log(user);
            div.innerHTML = "<br>Response Received!!<br>";
            let id = user.uid[0]["value"];
            let firstName = user.name[0]["value"];
            let date = user.created[0]["value"];
            let creationDate = new Date(date);
            let dateString = creationDate.toDateString();
            let timeString = creationDate.toLocaleDateString();
            let p1 = document.createElement("p");
            p1.innerHTML = `First Name:${firstName}`;
            let p2 = document.createElement("p");
            p2.innerHTML = `Id:${id}`;
            let p3 = document.createElement("p");
            p3.innerHTML = `Created At:${dateString},${timeString}`;
            div.appendChild(p1);
            div.appendChild(p2);
            div.appendChild(p3);
        })
        .catch((error) => {
            alert(`Error in server comm ${error}`);
        })
}