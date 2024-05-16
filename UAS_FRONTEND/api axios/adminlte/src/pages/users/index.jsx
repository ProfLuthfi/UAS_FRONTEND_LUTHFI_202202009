import React, { useState, useEffect, useMemo } from "react";
import { useTable, usePagination } from "react-table";
import axios from "axios";
import { useNavigate, Link } from "react-router-dom";

export default function Users() {
  const [data, setData] = useState([]);
  const Navigate = useNavigate();

  const getData = () => {
    axios
      .get("https://63929998b750c8d178e16014.mockapi.io/api/employee")
      .then((response) => {
        setData(response.data);
      });
  };

  useEffect(() => {
    getData();
  }, []);

  const handleEdit = (nik) => {
    console.log("Edit row with ID:", nik);
  };

  const handleDelete = (nik) => {
    Swal.fire({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this employee data!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        axios
          .delete(
            `https://63929998b750c8d178e16014.mockapi.io/api/employee/${nik}`
          )
          .then(() => {
            setData(data.filter((item) => item.nik !== nik));
            Swal.fire(
              "Deleted!",
              "The employee data has been deleted.",
              "success"
            ).then(() => {
              console.log("Successfully deleted row with NIK:", nik);
              window.location.reload();
            });
          })
          .catch((error) => {
            console.error("Error deleting row with NIK:", nik, error);
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Something went wrong!",
              footer: '<a href="#">Why do I have this issue?</a>',
            });
          });
      }
    });
  };

  const columns = useMemo(
    () => [
      {
        Header: "No",
        accessor: "nik",
      },
      {
        Header: "NIK",
        accessor: "id",
      },
      {
        Header: "First Name",
        accessor: "name",
      },
      {
        Header: "Join Date",
        accessor: "join_date",
        Cell: ({ value }) => {
          const options = {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
          };
          const formattedDate = new Date(value).toLocaleDateString(
            "id-ID",
            options
          );
          return formattedDate;
        },
      },
      {
        Header: "Salary",
        accessor: "salary",
        Cell: ({ value }) =>
          new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
          }).format(value),
      },
      {
        Header: "Action",
        accessor: "",
        Cell: ({ row }) => (
          <div>
            <Link
              to={`/edit/${row.original.nik}`}
              className="btn btn-primary mr-2"
            >
              Edit
            </Link>
            <button
              className="btn btn-danger"
              onClick={() => handleDelete(row.original.nik)}
            >
              Delete
            </button>
          </div>
        ),
      },
    ],
    []
  );

  const {
    getTableProps,
    getTableBodyProps,
    headerGroups,
    prepareRow,
    page,
    canPreviousPage,
    canNextPage,
    pageOptions,
    pageCount,
    gotoPage,
    nextPage,
    previousPage,
    setPageSize,
    state: { pageIndex, pageSize },
  } = useTable({ columns, data }, usePagination);

  return (
    <div className="content-wrapper">
      <div className="content-header">
        <div className="container-fluid">
          <div className="row mb-2">
            <div className="col-sm-6">
              <h1 className="m-0">Employee</h1>
            </div>
            <div className="col-sm-6">
              <ol className="breadcrumb float-sm-right">
                <li className="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li className="breadcrumb-item active">Employee</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div className="content">
        <div className="container-fluid">
          <div className="row mb-2">
            <div className="col-lg-12">
              <button
                className="btn btn-primary"
                onClick={() => Navigate("/employee")}
              >
                Add
              </button>
            </div>
          </div>
          <div className="row">
            <div className="col-lg-12">
              <div className="card">
                <h5 className="card-header">Employee</h5>
                <div className="card-body">
                  <table className="table table-bordered" {...getTableProps()}>
                    <thead>
                      {headerGroups.map((headerGroup) => (
                        <tr {...headerGroup.getHeaderGroupProps()}>
                          {headerGroup.headers.map((column) => (
                            <th {...column.getHeaderProps()}>
                              {column.render("Header")}
                            </th>
                          ))}
                        </tr>
                      ))}
                    </thead>
                    <tbody {...getTableBodyProps()}>
                      {page.map((row) => {
                        prepareRow(row);
                        return (
                          <tr {...row.getRowProps()}>
                            {row.cells.map((cell) => {
                              return (
                                <td {...cell.getCellProps()}>
                                  {cell.render("Cell")}
                                </td>
                              );
                            })}
                          </tr>
                        );
                      })}
                    </tbody>
                  </table>
                  <div className="pagination mt-3 float-right">
                    <button
                      className="btn btn-primary btn-xs mr-1"
                      onClick={() => gotoPage(0)}
                      disabled={!canPreviousPage}
                    >
                      {"<<"}
                    </button>{" "}
                    <button
                      className="btn btn-primary btn-xs mr-1"
                      onClick={() => previousPage()}
                      disabled={!canPreviousPage}
                    >
                      {"<"}
                    </button>{" "}
                    <button
                      className="btn btn-primary btn-xs mr-1"
                      onClick={() => nextPage()}
                      disabled={!canNextPage}
                    >
                      {">"}
                    </button>{" "}
                    <button
                      className="btn btn-primary btn-xs mr-1"
                      onClick={() => gotoPage(pageCount - 1)}
                      disabled={!canNextPage}
                    >
                      {">>"}
                    </button>{" "}
                    <span className="mr-1">
                      Page{" "}
                      <strong>
                        {pageIndex + 1} of {pageOptions.length}
                      </strong>{" "}
                    </span>
                    <select
                      value={pageSize}
                      onChange={(e) => {
                        setPageSize(Number(e.target.value));
                      }}
                    >
                      {[10, 20, 30, 40, 50].map((pageSize) => (
                        <option key={pageSize} value={pageSize}>
                          {pageSize}
                        </option>
                      ))}
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
