<div
  style="
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background: #f9f9f9;
    font-family: sans-serif;
  "
>
  <div
    style="
      background: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    "
  >
    <div style="padding: 20px; text-align: center">
      <img
        src="https://raw.githubusercontent.com/thienson271201/master/master/assets/images/service/logo-alt.png"
        alt="Logo"
        style="max-width: 150px; margin-bottom: 20px"
      />
      <h2 style="color: #333333">Xác thực tài khoản</h2>
      <p style="color: #555555">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
      <p style="color: #555555">Mã OTP của bạn là:</p>
      <div
        style="
          font-size: 28px;
          font-weight: bold;
          color: #28a745;
          margin: 20px 0;
        "
      >
        ' . $otp . '
      </div>
      <p style="color: #777777">
        Mã OTP có hiệu lực trong vòng <strong>5 phút</strong>. Vui lòng không
        chia sẻ với bất kỳ ai.
      </p>
      <p style="margin-top: 30px; color: #999999; font-size: 12px">
        Nếu bạn không yêu cầu mã này, vui lòng bỏ qua email.
      </p>
    </div>
  </div>
  <div
    style="text-align: center; font-size: 12px; color: #aaa; margin-top: 15px"
  >
    &copy; ' . date("Y") . ' Công ty của bạn. All rights reserved.
  </div>
</div>
