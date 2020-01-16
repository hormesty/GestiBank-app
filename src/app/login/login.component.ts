import { Component, OnInit } from '@angular/core';
import { AuthService } from '../services/auth.service';
import {NgForm} from '@angular/forms'
import { Router } from '@angular/router';
import { LoginResponse } from '../models/utilisateurAuth';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  logInfo: LoginResponse;
  
  constructor(private authService: AuthService, private router: Router) {}
 
  ngOnInit() {
    // this.authService.logout();
  }
 
  login(logForm:NgForm) {
    
    this.logInfo = logForm.value;
    this.logInfo.action ="login";
    this.authService.loginForm(this.logInfo).subscribe(response => {
      // console.log("response:  " +response.status);
      this.logInfo.message = response.message;
      
      if (response.status === 'success'){
        this.authService.loginRedirect(response);
      }

    })
  }

}
