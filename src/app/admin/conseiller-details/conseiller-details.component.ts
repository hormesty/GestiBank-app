import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Conseiller } from '../../models/conseiller';
import { ConseillerService } from '../../services/ConseillerService';

@Component({
  selector: 'app-conseiller-details',
  templateUrl: './conseiller-details.component.html',
  styleUrls: ['./conseiller-details.component.css'],
  providers:[ConseillerService]
})
export class ConseillerDetailsComponent implements OnInit {

  matConseiller: number;
  private sub: any;
  conseiller: Conseiller;

  constructor(private route: ActivatedRoute, private conseillerservice: ConseillerService) { }

  ngOnInit() {
    this.sub = this.route.params.subscribe(params => {
      this.matConseiller = +params['id']; // (+) converts string 'id' to a number
      console.log("matConseiller : " + this.matConseiller);
      this.getDetailConseiller();
    });
  }
  
  getDetailConseiller(){
    console.log ("lancement de la methode : "+this.matConseiller )
      this.conseillerservice.findConseillerByMatricule(this.matConseiller).subscribe(
      c => {this.conseiller=c}) 
  }

}
