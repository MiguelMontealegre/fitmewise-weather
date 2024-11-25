/* eslint-disable react-hooks/exhaustive-deps */
import { useState, useEffect } from "react";
import Icon from "react-icons-kit";
import { search } from "react-icons-kit/feather/search";
import { arrowUp } from "react-icons-kit/feather/arrowUp";
import { arrowDown } from "react-icons-kit/feather/arrowDown";
import { droplet } from "react-icons-kit/feather/droplet";
import { wind } from "react-icons-kit/feather/wind";
import { activity } from "react-icons-kit/feather/activity";
import { useDispatch, useSelector } from "react-redux";
import { get5DaysForecast, getCityData } from "./Store/Slices/WeatherSlice.js";
import { SphereSpinner } from "react-spinners-kit";

function App() {
  const {
    citySearchLoading,
    citySearchData,
    forecastLoading,
    forecastData,
  } = useSelector((state) => state.weather);

  const [loadings, setLoadings] = useState(true);

  const allLoadings = [citySearchLoading, forecastLoading];
  useEffect(() => {
    const isAnyChildLoading = allLoadings.some((state) => state);
    setLoadings(isAnyChildLoading);
  }, [allLoadings]);

  const [city, setCity] = useState("Pereira");

  const [unit, setUnit] = useState("metric");

  const toggleUnit = () => {
    setLoadings(true);
    setUnit(unit === "metric" ? "imperial" : "metric");
  };

  const dispatch = useDispatch();

  const fetchData = () => {
    dispatch(
      getCityData({
        city,
        unit,
      })
    ).then((res) => {
      if (!res.payload.error) {
        dispatch(
          get5DaysForecast({
            lat: res.payload.data.coord.lat,
            lon: res.payload.data.coord.lon,
            unit,
          })
        );
      }
    });
  };

  useEffect(() => {
    fetchData();
  }, [unit]);

  const handleCitySearch = (e) => {
    e.preventDefault();
    setLoadings(true);
    fetchData();
  };

  const filterForecastByFirstObjTime = (forecastData) => {
    if (!forecastData) {
      return [];
    }

    const firstObjTime = forecastData[0].dt_txt.split(" ")[1];
    return forecastData.filter((data) => data.dt_txt.endsWith(firstObjTime));
  };

  const filteredForecast = filterForecastByFirstObjTime(forecastData?.list);

  return (
    <div className="min-h-screen bg-gradient-to-b from-blue-500 via-blue-200 to-blue-50 bg-fixed bg-cover bg-center p-4">
      <div className="max-w-7xl mx-auto h-full rounded-lg border-2 border-white shadow-lg overflow-y-auto p-4 bg-white">
        <form
          className="flex items-center h-8 bg-white rounded-md shadow-sm"
          autoComplete="off"
          onSubmit={handleCitySearch}
        >
          <label className="flex items-center justify-center h-full pl-4 text-blue-500">
            <Icon icon={search} size={20} />
          </label>
          <input
            type="text"
            className="flex-grow h-full px-4 outline-none text-sm"
            placeholder="Enter City"
            required
            value={city}
            onChange={(e) => setCity(e.target.value)}
            readOnly={loadings}
          />
          <button
            type="submit"
            className="w-20 h-full bg-blue-500 text-white rounded-r-md hover:bg-blue-600"
          >
            GO
          </button>
        </form>

        <div className="mt-4 bg-white rounded-md p-4">
          <div className="flex justify-between items-center">
            <h4 className="text-gray-500">Current Weather</h4>
            <div
              className="w-20 h-8 bg-blue-500 flex items-center p-1 rounded-md relative cursor-pointer"
              onClick={toggleUnit}
            >
              <div
                className={`w-1/2 h-full bg-white rounded-md transition-transform ${
                  unit === "metric" ? "translate-x-0" : "translate-x-full"
                }`}
              ></div>
              <span className="absolute top-1.5 left-2 text-white">C</span>
              <span className="absolute top-1.5 right-2 text-white">F</span>
            </div>
          </div>

          {loadings ? (
            <div className="flex justify-center items-center mt-4">
              <SphereSpinner loadings={loadings} color="#2fa5ed" size={20} />
            </div>
          ) : citySearchData?.error ? (
            <div className="mt-4 p-3 bg-red-100 text-red-800 border border-red-200 rounded-md">
              {citySearchData.error}
            </div>
          ) : (
            <>
              {citySearchData?.data && (
                <div className="mt-4 flex flex-col md:flex-row md:divide-x md:divide-gray-300">
                  <div className="flex-1 p-4">
                    <h4 className="text-blue-500">
                      {citySearchData.data.name}
                    </h4>
                    <div className="flex items-center mt-2">
                      <img
                        src={`https://openweathermap.org/img/wn/${citySearchData.data.weather[0].icon}@2x.png`}
                        alt="icon"
                        className="w-12 h-12"
                      />
                      <h1 className="text-4xl text-blue-500 ml-2">
                        {citySearchData.data.main.temp}&deg;
                      </h1>
                    </div>
                    <h4 className="text-gray-500 mt-2">
                      {citySearchData.data.weather[0].description}
                    </h4>
                  </div>
                  <div className="flex-1 p-4 space-y-4">
                    <h4 className="text-blue-500">
                      Feels like {citySearchData.data.main.feels_like}&deg;C
                    </h4>
                    <div className="space-y-2">
                      <div className="flex justify-between">
                        <div className="text-gray-500">
                          <Icon icon={arrowUp} size={20} />
                          <span className="ml-2">Max</span>
                        </div>
                        <span className="text-blue-500">
                          {citySearchData.data.main.temp_max}&deg;C
                        </span>
                      </div>
                      <div className="flex justify-between">
                        <div className="text-gray-500">
                          <Icon icon={arrowDown} size={20} />
                          <span className="ml-2">Min</span>
                        </div>
                        <span className="text-blue-500">
                          {citySearchData.data.main.temp_min}&deg;C
                        </span>
                      </div>
                      <div className="flex justify-between">
                        <div className="text-gray-500">
                          <Icon icon={droplet} size={20} />
                          <span className="ml-2">Humidity</span>
                        </div>
                        <span className="text-blue-500">
                          {citySearchData.data.main.humidity}%
                        </span>
                      </div>
                      <div className="flex justify-between">
                        <div className="text-gray-500">
                          <Icon icon={wind} size={20} />
                          <span className="ml-2">Wind</span>
                        </div>
                        <span className="text-blue-500">
                          {citySearchData.data.wind.speed} kph
                        </span>
                      </div>
                      <div className="flex justify-between">
                        <div className="text-gray-500">
                          <Icon icon={activity} size={20} />
                          <span className="ml-2">Pressure</span>
                        </div>
                        <span className="text-blue-500">
                          {citySearchData.data.main.pressure} hPa
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              )}
              <h4 className="text-gray-500 mt-6">Extended Forecast</h4>
              <div className="mt-4 grid grid-cols-1 md:grid-cols-5 gap-4">
                {filteredForecast.map((data, index) => {
                  const date = new Date(data.dt_txt);
                  const day = date.toLocaleDateString("en-US", {
                    weekday: "short",
                  });
                  return (
                    <div
                      key={index}
                      className="flex flex-col items-center p-4 bg-blue-500 text-white rounded-lg shadow"
                    >
                      <h5>{day}</h5>
                      <img
                        src={`https://openweathermap.org/img/wn/${data.weather[0].icon}.png`}
                        alt="icon"
                        className="w-12 h-12"
                      />
                      <h5>{data.weather[0].description}</h5>
                      <h5 className="mt-2 font-medium">
                        {data.main.temp_max}&deg; / {data.main.temp_min}&deg;
                      </h5>
                    </div>
                  );
                })}
              </div>
            </>
          )}
        </div>
      </div>
    </div>
  );
}

export default App;
