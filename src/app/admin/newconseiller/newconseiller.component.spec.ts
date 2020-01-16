import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NewconseillerComponent } from './newconseiller.component';

describe('NewconseillerComponent', () => {
  let component: NewconseillerComponent;
  let fixture: ComponentFixture<NewconseillerComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NewconseillerComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NewconseillerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
