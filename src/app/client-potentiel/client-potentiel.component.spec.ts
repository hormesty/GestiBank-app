import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ClientPotentielComponent } from './client-potentiel.component';

describe('ClientPotentielComponent', () => {
  let component: ClientPotentielComponent;
  let fixture: ComponentFixture<ClientPotentielComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ClientPotentielComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ClientPotentielComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
