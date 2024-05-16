import React from "react";
import "./App.css";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import WithNavbar from "./layouts/WithNavbar";
import WithOutnavbar from "./layouts/WithOutnavbar";
import Signin from "./pages/auth/Signin";
import Signup from "./pages/auth/Signup";
import Home from "./pages/home";
import Users from "./pages/users";
import Employee from "./pages/employee";
import Edit from "./pages/employee/edit";

function App() {
  return (
    <Router>
      <Routes>
        <Route element={<WithOutnavbar />}>
          <Route path="/signin" element={<Signin />} />
          <Route path="/signup" element={<Signup />} />
        </Route>
        <Route element={<WithNavbar />}>
          <Route path="/" element={<Home />} />
          <Route path="/users" element={<Users />} />
          <Route path="/employee" element={<Employee />} />
          <Route path="/edit/:nik" element={<Edit />} />
        </Route>
      </Routes>
    </Router>
  );
}

export default App;
