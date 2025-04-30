<x-guest-layout>
  <style>

    .containerModal {
      padding: 1.5rem;
      background: white;
      height: 100vh;
    }

    .containerModal h2 {
      color: #1A2EFF;
      font-size: 1.3rem;
      font-weight: 700;
    }

    .containerModal .section-title {
      font-weight: 600;
      font-size: 1.1rem;
      margin: 1.5rem 0 1rem;
    }

    .containerModal .bank-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .containerModal .bank-card {
      flex: 1 1 calc(20% - 1rem);
      background-color: #fff;
      border-radius: 16px;
      padding: 0.7rem;
      text-align: center;
      box-shadow: 0 8px 5px rgba(0,0,0,0.05);
      min-width: 100px;
      transition: transform 0.2s;
    }

    .containerModal .bank-card:hover {
      transform: translateY(-3px);
    }

    .containerModal .bank-card img {
      max-width: 60px;
    }

    .containerModal .bank-card span {
      display: block;
      font-size: 0.9rem;
    }




    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .close-btn {
      font-size: 1.7rem;
      font-weight: bold;
      color: #888;
    }

  </style>

  <div class="containerModal">
    
    <div class="modal-header">
        <h2>Link Your Account</h2>
        <span class="close-btn" aria-label="Close">&times;</span>
    </div>
    <div class="section-title">Select Bank to Link or Open an Account</div>

    <div class="bank-grid">
      <div class="bank-card">
        <div style="display: flex;justify-content:center">
            <img src="https://static.instantpay.in/assets/logo/banks/icon_130878.svg" alt="Axis Bank"/>
        </div>
        <div>
            <p>Axis Bank</p>
        </div>
      </div>
      <div class="bank-card">
        <div style="display: flex;justify-content:center">
            <img src="https://static.instantpay.in/assets/logo/banks/icon_130878.svg" alt="Axis Bank"/>
        </div>
        <div>
            <p>Axis Bank</p>
        </div>
      </div>
      <div class="bank-card">
        <div style="display: flex;justify-content:center">
            <img src="https://static.instantpay.in/assets/logo/banks/icon_130878.svg" alt="Axis Bank"/>
        </div>
        <div>
            <p>Axis Bank</p>
        </div>
      </div>
      <div class="bank-card">
        <div style="display: flex;justify-content:center">
            <img src="https://static.instantpay.in/assets/logo/banks/icon_130878.svg" alt="Axis Bank"/>
        </div>
        <div>
            <p>Axis Bank</p>
        </div>
      </div>
      <div class="bank-card">
        <div style="display: flex;justify-content:center">
            <img src="https://static.instantpay.in/assets/logo/banks/icon_130878.svg" alt="Axis Bank"/>
        </div>
        <div>
            <p>Axis Bank</p>
        </div>
      </div>
      <div class="bank-card">
        <div style="display: flex;justify-content:center">
            <img src="https://static.instantpay.in/assets/logo/banks/icon_130878.svg" alt="Axis Bank"/>
        </div>
        <div>
            <p>Axis Bank</p>
        </div>
      </div>

    </div>

            
    <div class="section-title">Banks Going Live Soon</div>

    <div class="bank-grid">
        <div style="display: flex;justify-content:center;align-items:center">
            <img src="https://static.instantpay.in/assets/logo/banks/icon_130878.svg" alt="Axis Bank" width="30px">&nbsp;&nbsp;
            <span>Kotak Mahindra Bank</span>
        </div>
        <div style="display: flex;justify-content:center;align-items:center">
            <img src="https://static.instantpay.in/assets/logo/banks/icon_130878.svg" alt="Axis Bank" width="30px">&nbsp;&nbsp;
            <span>Kotak Mahindra Bank</span>
        </div>
    </div>

  </div>
</x-guest-layout>