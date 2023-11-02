import styles from '../../styles/cards.module.css';
import { useState } from 'react';
import Modal from '../cards/Modal';
import Image from 'next/image';

export default function Welcome() {
  const [showModal, setShowModal] = useState(false);
  const [Message, setMessage] = useState('');

  const myLoader = ({ src, width, quality }) => {
    return `${src}`;
  };

  return (
    <>
      <div className={styles.card}>
        <h1 className={styles.head}>Healthy Chain</h1>
        <br />
        <p>
          Is a decentralised medical record storage system which uses the
          security of Blockchain and is deployed on Ethereum Blockchain. Many A
          times, Medical Records get misplaced, though they are very important.
          So, Healthy chain is one stop solutions to all your hassle of keeping safe
          your Medical Records.
        </p>
        <br />
        <br />
        <div
          className={styles.head}
          style={{
            width: '50%',
            height: '100%',
            minWidth: '200px',
            maxHeight: '70px',
            margin: '0 auto',
            cursor: 'help',
          }}
        >
         
        </div>
      </div>
      
    </>
  );
}
