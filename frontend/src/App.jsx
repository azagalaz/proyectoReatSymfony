import { useEffect, useState } from 'react';

function App() {
  const [message, setMessage] = useState('');

  useEffect(() => {
    fetch('/api/hello')
      .then((response) => response.text())
      .then((data) => setMessage(data));
  }, []);

  return (
    <div>
      <h1>Frontend</h1>
      <p>Las Almenaras Arden!!</p>
      <p>Backend response: {message}</p>
    </div>
  );
}

export default App;
