function connect() {
    fetch("http://localhost/drupal-9.3.0/session/token")
        .then(function(response) {
            return response;
        })
        .then(function(token) {
            console.log("CSRF TOKEN" + token);
            userlogin(token);
        });
}


function userlogin(csrfToken) {
    let name = document.getElementById("name").value;
    let password = document.getElementById("password").value;
    //console.log(name);
    fetch("http://localhost/drupal-9.3.0/user/login?_format=json", {
            method: "POST",
            headers: {
                "Context-Type": "application/json",
                "X-CSRF-Token": csrfToken,
            },
            body: JSON.stringify({
                name: name,
                pass: password,
            }),
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.message) {
                alert(data.message);
                // let main = document.querySelector("#main");
                // main.innerHTML = "Welcome " + data.current_user.name;
            } else {
                let main = document.querySelector("#main");
                main.innerHTML = "Welcome " + data.current_user.name + "<br/><br/>" +
                    "<br/> <button type='button' onclick='logout()' class='btcolor'>Logout</button>";
            }
        });
}

function logout() {
    fetch("http://localhost/drupal-9.3.0/user/logout");
    let main = document.querySelector("#main");
    main.innerHTML = "User has been Logged out. Click to " +
        "<br/> <a href='http://localhost/drupal.html'>Login</a>";
    //});
}