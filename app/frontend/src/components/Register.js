import { useState } from "react";
import axios from 'axios';
import './Form.css';
  
export default  function Register () {

    const [mail, setMail] = useState("");
    const [usersName, setUsersName] = useState("");
    const [password, setPassword] = useState("");
    // const [result, setResult] = useState([]);
    // let tab = [] ;



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
        url: "http://localhost:8888/app/backend/src/register.php",
        method: "POST",
        headers: {
            authorization: "your token comes here",
        },
        data: formData,
    })

    .then(function (response) {
        return response.data ;
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
      <div className="form-Register">
          <span> <p> S'inscrire </p></span>
          <form onSubmit={(event) => handleSumbit(event)}  className="cici">
              <div>
                  <label htmlFor="mail"> Adresse mail : </label>
                  <input
                      type="email"
                      id="mail"
                      name="mail"
                      value={mail}
                      onChange={(event) => handleChangeMail(event)} />
              </div>

              <div>
                  <label htmlFor="usersName">Nom utilisateur : </label>
                  <input
                      type="text"
                      id="usersName"
                      name="usersName"
                      value={usersName}
                      onChange={(event) => handleChangeUsersName(event)}
                  />
              </div>

              <div>
                  <label htmlFor="content"> Mot de passe : </label>
                  <input
                      type="password"
                      id="password"
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
