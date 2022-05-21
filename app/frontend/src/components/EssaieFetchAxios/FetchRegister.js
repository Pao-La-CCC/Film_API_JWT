import { useState } from "react";
import './Form.css';
  
export default  function Register () {
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
        const formData = new FormData(this) ;
        formData.append('mail',mail) ;
        formData.append('usersName',usersName)
        formData.append('password',password)

        // Envoie vers le Serveur PHP du dossier server.PHP
       fetch('http://localhost:8888/app/backend/src/server.php',
       {
           method : 'POST' ,
           body : formData ,
       })
        .then((response)=>{
            console.log(response)
            return response.json() ;
        }) 
        .then((resp)=>{
            console.log(resp) ;
            // Je récupère mon tableau d'objet. Je met ses objets dans un tableau autre que je met à la place de result.
            for ( let keys of resp){
                console.log(keys);
                tab.push(keys) ;
                setResult(tab) ;
            }
        })
        .catch((err)=>{
            console.log(err)
        })
        setMail('');
        setUsersName('');
        setPassword('');
    } 
    const info = result.map((elem) =>
    <div key={elem.id}>
        <div>
            <h3>{elem.title}</h3>
            <h4>Par : {elem.users_name}</h4>
        </div>
        <div>
            <p>{elem.content}</p>
        </div>
    </div>
);
  
    return (
        
        <div className="form-Login">
            

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
    );
}

