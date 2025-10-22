export type ProductData = {
name: string;
price: number;
category: string;
stock: number | null;
};
export type StockStatus = 'In Stock' | 'Low Stock' | 'Out of Stock';
