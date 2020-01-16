import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import {NgForm} from '@angular/forms';
import { ClientPotentiel } from '../../models/clientPotentiel';
import { ClientPotentielService } from 'src/app/services/client-potentiel-service.service';

@Component({
  selector: 'app-demandeouverture',
  templateUrl: './demandeouverture.component.html',
  styleUrls: ['./demandeouverture.component.css'],
  providers:[ClientPotentielService]
})
export class DemandeouvertureComponent implements OnInit {
  
  private clientPotentiel:ClientPotentiel[] ;
  
constructor(private route: ActivatedRoute, private clientpotentielservice: ClientPotentielService) { }

  ngOnInit() {
    this.getDemandes()
  }

  getDemandes(){
    this.clientpotentielservice.findAll().subscribe(
      c => {this.clientPotentiel=c;} );
  }

 
}
