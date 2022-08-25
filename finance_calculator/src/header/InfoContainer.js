import logo from './imgs/iOPinkLogo.png';

const InfoContainer = () => {
    return (
        <header className="infoContainer">
            <h1 className="infoTitle">Finance Calculator</h1>
            <p className="infoText">Fill out the form below and we will calculate exactly what you will pay for your tuition at Mayden Academy and how long it will take to pay that back</p>
            <img className='iOLogo' src={logo} alt="iO Logo" />
        </header>
    )
}

export default InfoContainer;