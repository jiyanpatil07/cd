// UpdateData.js
import React, { useState } from 'react';
import './UpdateData.css'; // Import your CSS file

const UpdateData = () => {
  // State to store form data
  const [formData, setFormData] = useState({
    id: '',
    name: '',
    city: '',
    age: '',
  });

  // Function to handle form input changes
  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  // Function to handle form submission
  const handleFormSubmit = async (e) => {
    e.preventDefault();

    try {
      // Send a POST request to the API endpoint
      await fetch('http://localhost:8082/api/student/update-data', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
      }).then(res => res.json()).then(result => console.log(result));

    } catch (error) {
      console.error('Error occurred while updating data:', error);
    }
  };

  return (
    <div className="form-container-update">
      <h2>Enter the Existing Data to Update Data with New One</h2>
      <form onSubmit={handleFormSubmit}>
        <label className="form-label">
          ID:
          <input type="number" name="id" value={formData.id} onChange={handleInputChange} className="form-input" />
        </label>
        <label className="form-label">
          Name:
          <input type="text" name="name" value={formData.name} onChange={handleInputChange} className="form-input" />
        </label>
        <label className="form-label">
          City:
          <input type="text" name="city" value={formData.city} onChange={handleInputChange} className="form-input" />
        </label>
        <label className="form-label">
          Age:
          <input type="text" name="age" value={formData.age} onChange={handleInputChange} className="form-input" />
        </label>
        <button type="submit" className="form-button">Save</button>
      </form>
    </div>
  );
};

export default UpdateData;
  