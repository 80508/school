using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class beweegscript : MonoBehaviour {

	public float xspeed = 0f;
	public float power = 0.001f;
	public bool boost;
	public float friction = 0.95f;
	public bool right = false;
	public bool left = false;

	public float fuel = 2;


	// Use this for initialization
	void FixedUpdate () {


		if(right){
			xspeed += power;
			fuel -= power;
		}
		if(left){
			xspeed -= power;
			fuel -= power;
		}


	}

	// Update is called once per frame
	void Update () {
		boost = false;

		if(Input.GetKeyDown("w")){
			right = true;
		}
		if(Input.GetKeyUp("w")){
			right = false;
		}
		if(Input.GetKeyDown("s")){
			left = true;
		}
		if(Input.GetKeyUp("s")){
			left = false;
		}

		if (Input.GetKeyDown ("left shift")) {
			boost = true;
		}

		if(fuel < 0){

			xspeed = 0;

		}

		xspeed *= friction;
		transform.Translate(Vector3.right * -xspeed);

		boost = false;

	}
}
