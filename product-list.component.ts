import { Component, OnInit } from '@angular/core';
import { ImagepostService } from '../services/imagepost.service';
import { cartModel, cartItems } from '../cartModel';

@Component({
  selector: 'app-product-list',
  templateUrl: './product-list.component.html',
  styleUrls: ['./product-list.component.css']
})
export class ProductListComponent implements OnInit {

  productItems: any = null;
  cart_Items = new cartModel();
  subTotal: number = 0;
  constructor(private listService: ImagepostService) { }

  ngOnInit() {
    this.loadProducts();
    this.cart_Items.book_date = '1549901062';
    this.cart_Items.book_notes = 'Sample Test Post';
    this.cart_Items.participants = '10';
  }

  loadProducts() {
    this.listService.getAll().subscribe(res => {
      this.productItems = res['data'];
      console.log(res);
    });
  }

  addToCart(product) {
    console.log(product);
    let tempcart = new cartItems();
    tempcart.id = product.id;
    tempcart.price = product.price;
    var testFlag = false;
    
    var ind = 0;
    for (let citem of this.cart_Items.paramList){
      if(citem.id == product.id) {
        this.cart_Items.paramList[ind].qty += tempcart.qty;   
        testFlag = false;
        break;
      } else {
        testFlag = true;
      }
      ind++;
    }

    if(this.cart_Items.paramList.length < 1) {
      this.cart_Items.paramList.push(tempcart);
    }

    if(testFlag) {
      this.cart_Items.paramList.push(tempcart);
    }
    
    console.log('Cart ', this.cart_Items.paramList);
    this.subTotal = this.cart_Items.paramList.reduce( (carry, item) => {
      return carry + (+item.price * +this.cart_Items.participants);
    }, 0);
  }

}
