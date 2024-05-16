import React, { useState, useEffect } from "react";
import { useForm } from "react-hook-form";
import axios from "axios";
import { useNavigate } from "react-router-dom";

const Employee = () => {
  const Navigate = useNavigate();
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();

  const onSubmit = (data) => {
    axios
      .post("https://63929998b750c8d178e16014.mockapi.io/api/employee", data)
      .then((res) => {
        console.log(res);
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Data added successfully!",
        }).then(() => {
          Navigate("/users");
        });
        console.error("Error adding data:", error);
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Failed to add data. Please try again later.",
        });
      });
  };

  return (
    <div className="content-wrapper">
      <div className="content-header">
        <div className="container-fluid">
          <div className="row mb-2">
            <div className="col-sm-6">
              <h1 className="m-0">Add Employee</h1>
            </div>
            <div className="col-sm-6">
              <ol className="breadcrumb float-sm-right">
                <li className="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li className="breadcrumb-item">
                  <a a href="/users">
                    Employee
                  </a>
                </li>
                <li className="breadcrumb-item active">Add Employee</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div className="content">
        <div className="container-fluid">
          <div className="row">
            <div className="col-lg-12">
              <div className="card">
                <div className="card-header">Employee Create</div>
                <div className="card-body">
                  <form onSubmit={handleSubmit(onSubmit)}>
                    <div className="form-group">
                      <label htmlFor="">NIK</label>
                      <input
                        type="text"
                        name="id"
                        className="form-control"
                        {...register("id", { required: true })}
                      />
                      {errors.nik && (
                        <span className="text-danger">
                          This field is required
                        </span>
                      )}
                    </div>
                    <div className="form-group">
                      <label htmlFor="">Fullname</label>
                      <input
                        type="text"
                        name="name"
                        className="form-control"
                        {...register("name", { required: true })}
                      />
                      {errors.fullname && (
                        <span className="text-danger">
                          This field is required
                        </span>
                      )}
                    </div>
                    <div className="form-group">
                      <label htmlFor="">Join Date</label>
                      <input
                        type="date"
                        name="join_date"
                        className="form-control"
                        {...register("join_date", { required: true })}
                      />
                      {errors.join_date && (
                        <span className="text-danger">
                          This field is required
                        </span>
                      )}
                    </div>
                    <div className="form-group">
                      <label htmlFor="">Salary</label>
                      <input
                        type="number"
                        name="salary"
                        className="form-control"
                        {...register("salary", { required: true })}
                      />
                      {errors.salary && (
                        <span className="text-danger">
                          This field is required
                        </span>
                      )}
                    </div>
                    <div className="float-right">
                      <input className="btn btn-primary" type="submit" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Employee;
