export class cartModel {
    book_date: string = '';
    participants: string = '';
    book_notes: string = '';
    paramList: Array<cartItems> = [];
}

export class cartItems {
    id: string = '';
    price: string = '';
    qty: number = 1;
}
