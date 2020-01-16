import {Injectable} from "@angular/core";
import{HttpClient, HttpHeaders} from "@angular/common/http";
import{Observable} from "rxjs";
import { LoginResponse } from '../models/utilisateurAuth';
import { Router } from "@angular/router";
 
@Injectable({
  providedIn: 'root'
})

export class AuthService {
    //API
    private apiUrl = 'http://127.0.0.1:8080/projects/GESTI_bank//authentification.php';

    
    constructor ( private router:Router, private http: HttpClient) {}

    httpOptions = {
      headers: new HttpHeaders({
        'Content-Type': 'application/json'
      })
    };
 

    // Verify user on server to get token
    loginForm(data):Observable<LoginResponse>
    {   
        console.log('>>>>>>>>>>>>>>>envoi data')
        return this.http.post<LoginResponse>(this.apiUrl,data,this.httpOptions)

    }

    loginRedirect(resp: LoginResponse)
    { localStorage.setItem('message', resp.message);
      // console.log('<<<<<<<<<<< retour data');
      // console.log('message ==='+ resp.message);
      // console.log('type==='+ resp.type);
      
      if(resp.type === 'admin'){
        this.router.navigate(['admin']);
        console.log("redirige vers admin");
      } 

      if(resp.type === 'conseiller'){
        this.router.navigate(['conseiller']);
        console.log("redirige vers conseiller");
      }
    
      
      if(resp.type === 'client'){
        this.router.navigate(['client']);
        console.log("redirige vers client"); 
      }
      // console.log("type ==== " + resp.type);
      // console.log("after routage ...");
    }

}