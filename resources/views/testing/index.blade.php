
<x-guest-layout>

    <style>
  
      .containerBankDetails {
        max-width: 500px;
        margin: auto;
        text-align: center;
      }
  
      .containerBankDetails .bank-info {
        background-color: #F8F4F4;
        padding: 1rem;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1rem;
      }
  
      .containerBankDetails .bank-info-text {
        text-align: left;
        max-width: 85%;
        font-size: 0.95rem;
      }
  
      .containerBankDetails .bank-info strong {
        display: block;
        font-size: 1rem;
        color: #000;
      }
  
      .containerBankDetails .bank-info img {
        width: 24px;
        height: 24px;
      }
  
      .containerBankDetails .access-options {
        display: flex;
        justify-content: space-around;
        margin: 2rem 0;
      }
  
      .containerBankDetails .access {
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: 120px;
      }
  
      .containerBankDetails .access-icon {
        background-color: #E6E6E6;
        border-radius: 12px;
        padding: 12px;
        margin-bottom: 0.5rem;
        font-size: 24px;
      }
  
      .containerBankDetails .access span {
        font-size: 0.95rem;
        color: #444;
      }
  
      .containerBankDetails .illustration img {
        width: 100%;
        max-width: 300px;
        margin: 2rem auto;
      }
  
      .containerBankDetails .cta-text {
        font-size: 0.95rem;
        margin-bottom: 1rem;
        color: #333;
      }
  
      .containerBankDetails .cta-button {
        padding: 0.7rem 1.5rem;
        background-color: #F4F6FF;
        border: 2px solid #1A2EFF;
        color: #1A2EFF;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: 0.3s;
      }
  
      .containerBankDetails .cta-button:hover {
        background-color: #E0E5FF;
      }
  
      @media (max-width: 480px) {
        .access-options {
          gap: 1.5rem;
        }
      }
    </style>

    <div class="containerBankDetails">
      <h2>Adding Current Account</h2>
  
      <div class="bank-info">
        <div class="bank-info-text">
          <strong>Yes Bank</strong>
          Instantpay gives you a host of features on top of your Yes Bank C/A to efficiently manage your business
        </div>
        <img src="https://img.icons8.com/fluency-systems-filled/48/DA1C5C/checkmark.png" alt="checkmark" />
      </div>
  
      <div class="access-options">
        <div class="access">
          <div class="access-icon">👁️</div>
          <span>Viewing Access</span>
        </div>
        <div class="access">
          <div class="access-icon" style="padding-left: 22px;padding-right: 22px;">₹</div>
          <span>Transactional Access</span>
        </div>
      </div>
  
      <div class="illustration">
        <img src="https://static.instantpay.in/assets/accounts/link/ac_link.svg" alt="illustration" />
      </div>
  
      <p class="cta-text">
        Modernise your business banking experience by effortlessly linking your Yes Bank current account with Instantpay!
      </p>
  
      <button class="cta-button">Request Callback</button>
    </div>
   

</x-guest-layout>