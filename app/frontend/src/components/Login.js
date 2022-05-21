import { useState } from "react";
import jwt_decode from "jwt-decode";
import axios from 'axios';
import './Form.css';
  
export default  function Login () {

    const [mail, setMail] = useState("");
    const [usersName, setUsersName] = useState("");
    const [password, setPassword] = useState("");
    const [result, setResult] = useState([]);
    let tab = [] ;

    



    const handleChangeMail = (e) => {
        setMail(e.target.value);
    };

    const handleChangeUsersName = (e) => {
        setUsersName(e.target.value) ;
    };

    const handleChangePassword = (e) => {
        setPassword(e.target.value);
    };

    const handleSumbit = (e) => {
        e.preventDefault();
        const formData = new FormData() ;
        formData.append('mail',mail) ;
        formData.append('usersName',usersName)
        formData.append('password',password)
    
    axios({
        url: "http://localhost:8888/app/backend/src/verifier.php",
        method: "POST",
        headers: {
            "Authorization" : `Bearer ${localStorage.getItem("tokensJWT")}`
        },
        data: formData,
    })

    .then(function (response) {
        if (response.status === 200) { 
            setResult(response.data);
            // Pour mettre mon Token dans mon local storage.
            localStorage.setItem('tokensJWT', JSON.stringify(response.data));
            console.log("resultat : ",result)

            // On met dans un tableau le token JWT décodé
            let value = tab.push(jwt_decode(result));
            console.log(value );
             
        }
    })
    .then((resp)=>{
        console.log(resp) ;

    })
    .catch(function (error) {
        console.log(error);
    });
      setMail('');
      setUsersName('');
      setPassword('');
    }

  return (
      <div className="form-Login">
          <span> <p> Se connecter </p></span>
          <form onSubmit={(event) => handleSumbit(event)}  className="cici">
              <div>
                  <label htmlFor="mail"> Adresse mail : </label>
                  <input
                      type="email"
                      name="mail"
                      value={mail}
                      onChange={(event) => handleChangeMail(event)} />
              </div>

              <div>
                  <label htmlFor="usersName">Nom utilisateur : </label>
                  <input
                      type="text"
                      name="usersName"
                      value={usersName}
                      onChange={(event) => handleChangeUsersName(event)}
                  />
              </div>

              <div>
                  <label htmlFor="content"> Mot de passe :</label>
                  <input
                      type="password"
                      name="password"
                      value={password}
                      onChange={(event) => handleChangePassword(event)} />
              </div>
              
              <br />
              <button type="submit">Submit</button>
          </form>
         
      </div>
      )

}
