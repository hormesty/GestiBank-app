import{HttpClient,HttpHeaders} from "@angular/common/http";
import{Observable} from "rxjs";
import {Injectable} from '@angular/core';
import { ClientPotentiel } from '../models/clientPotentiel';

@Injectable()

export class GestionDemandesServices {

    private apiUrl = 'http://127.0.0.1:8080/projects/GESTI_bank/gestiondemandes.php';

    constructor (private http: HttpClient){}

    findAll():Observable<ClientPotentiel[]>
    {
        return this.http.get<ClientPotentiel[]>(this.apiUrl);
    }

    

}