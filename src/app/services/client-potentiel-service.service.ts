import{HttpClient,HttpHeaders} from "@angular/common/http";
import{Observable} from "rxjs";
import {Injectable} from '@angular/core';
import { ClientPotentiel } from '../models/clientPotentiel';

@Injectable()

export class ClientPotentielService {

    private apiUrl = 'http://127.0.0.1:8080/projects/GESTI_bank/clientPotentiel.php';

    constructor (private http: HttpClient){}

    findAll():Observable<ClientPotentiel[]>
    {
        return this.http.get<ClientPotentiel[]>(this.apiUrl);
    }

    addClientPotentiel(clientPotentiel:ClientPotentiel):Observable<ClientPotentiel>
    {
        return this.http.post<ClientPotentiel>(this.apiUrl,clientPotentiel);
    }

}