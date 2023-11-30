// GetData.js
import React, { useEffect, useState } from "react";
import './GetData.css';

export default function GetData() {
  const [result, setResult] = useState();

  useEffect(() => {
    fetch("http://localhost:8082/api/student/get-data")
      .then((res) => res.json())
      .then((result) => setResult(result))
      .catch((err) => console.log(err));
  }, [result]);

  return (
    <div className="container">
      {result?.map((r) => (
        <div key={r.id} className="item">
          <p>Name: {r.name}</p>
          <p>Age: {r.age}</p>
          <p>City: {r.city}</p>
        </div>
      ))}
    </div>
  );
}
