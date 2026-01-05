import { Routes, Route, BrowserRouter } from "react-router-dom";
import Products from "./Components/Products";
import Product from "./Components/Product";
import AddProduct from "./Components/AddProduct";
import EditProduct from "./Components/EditProduct";
import DelProduct from "./Components/DelProduct";
import Login from "./Components/Login";
import Logout from "./Components/Logout";
import NoMatch from "./Components/NoMatch";

function MyApplication() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<h1>Home Page</h1>} />
        <Route path="/products" element={<Products/>}/>
        <Route path="/product/show/:id" element={<Product/>}/>
        <Route path="/product/add" element={<AddProduct />}/>
        <Route path="/product/edit/:id" element={<EditProduct />}/>
        <Route path="/product/del/:id" element={<DelProduct />}/>
        <Route path="/login" element={<Login />}/>
        <Route path="/logout" element={<Logout />}/>
        <Route path="*" element={<NoMatch/>}/>
      </Routes>
    </BrowserRouter>
  );
}

export default MyApplication;
